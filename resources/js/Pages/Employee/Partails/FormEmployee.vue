<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { ref, watch, defineProps } from "vue";
import axios from "axios";

const props = defineProps({
    formData: {
        type: Object,
        required: true,
    },
    edit: {
        type: Boolean,
        default: false,
    },
});

const zipcode = ref(props.formData.zipcode);
const document = ref(props.formData.document);

watch(
    () => [props.formData.zipcode, props.formData.document],
    ([newZipCode, newDocument]) => {
        zipcode.value = newZipCode;
        document.value = newDocument;
    }
);

const findAddress = async () => {
    await axios
        .get(`https://viacep.com.br/ws/${zipcode.value}/json/`)
        .then((response) => {
            props.formData.address = response.data.logradouro;
            props.formData.district = response.data.bairro;
            props.formData.city = response.data.localidade;
            props.formData.state = response.data.estado;
        });
};

const validateDocument = (document) => {
    document = document.replace(/\D/g, "");
    if (document.length !== 11 || /^(\d)\1{10}$/.test(document)) return false;

    let sum = 0;
    let remainder;

    for (let i = 1; i <= 9; i++) {
        sum += parseInt(document[i - 1]) * (11 - i);
    }
    remainder = (sum * 10) % 11;
    if (remainder === 10 || remainder === 11) remainder = 0;
    if (remainder !== parseInt(document[9])) return false;

    sum = 0;

    for (let i = 1; i <= 10; i++) {
        sum += parseInt(document[i - 1]) * (12 - i);
    }
    remainder = (sum * 10) % 11;
    if (remainder === 10 || remainder === 11) remainder = 0;
    if (remainder !== parseInt(document[10])) return false;

    return true;
};

const validadeEmployeeDocument = () => {
    if (!validateDocument(props.formData.document)) {
        props.formData.errors.document = "Invalid Document.";
    } else {
        props.formData.errors.document = "";
    }
};

const allowOnlyNumbers = (event) => {
    if (!/[0-9]/.test(event.key) && event.key !== "Backspace") {
        event.preventDefault();
    }
};

const formatInput = (event) => {
    // Remove non-numeric characters from the input
    props.formData.document = props.formData.document.replace(/\D/g, "");
};
</script>

<template>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <InputLabel for="name" value="Name" />

            <TextInput
                id="name"
                v-model="formData.name"
                type="text"
                class="mt-1 block w-full"
            />
            <InputError :message="formData.errors.name" class="mt-2" />
        </div>

        <div>
            <InputLabel for="documment" value="Document" />

            <TextInput
                maxlength="11"
                id="document"
                @focusout="validadeEmployeeDocument"
                @keypress="allowOnlyNumbers"
                @input="formatInput"
                v-model="formData.document"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.document" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <InputLabel for="email" value="Email" />

            <TextInput
                id="email"
                v-model="formData.email"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.email" class="mt-2" />
        </div>

        <div v-if="!props.edit">
            <InputLabel for="password" value="Password" />

            <TextInput
                id="password"
                v-model="formData.password"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.password" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <InputLabel for="role" value="Role" />

            <TextInput
                id="role"
                v-model="formData.role"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.role" class="mt-2" />
        </div>

        <div>
            <InputLabel for="born_date" value="Bord Date" />

            <TextInput
                id="born_date"
                v-model="formData.born_date"
                type="date"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.born_date" class="mt-2" />
        </div>
    </div>

    <div class="grid grid-cols-6 gap-4">
        <div>
            <InputLabel for="zipcode" value="Zip Code" />

            <TextInput
                maxlength="8"
                id="zipcode"
                v-model="formData.zipcode"
                @keypress="allowOnlyNumbers"
                @focusout="findAddress"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.zipcode" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-6 mb-6 md:grid-cols-6">
        <div class="col-span-3">
            <InputLabel for="address" value="Address" />

            <TextInput
                id="address"
                v-model="formData.address"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.address" class="mt-2" />
        </div>

        <div>
            <InputLabel for="number" value="Number" />

            <TextInput
                id="number"
                v-model="formData.number"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.number" class="mt-2" />
        </div>

        <div class="col-span-2">
            <InputLabel for="complement" value="Complement" />

            <TextInput
                id="complement"
                v-model="formData.complement"
                type="text"
                class="mt-1 block w-full"
            />
        </div>
    </div>

    <div class="grid gap-6 mb-6 md:grid-cols-3">
        <div>
            <InputLabel for="district" value="District" />

            <TextInput
                id="district"
                v-model="formData.district"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.district" class="mt-2" />
        </div>

        <div>
            <InputLabel for="city" value="City" />

            <TextInput
                id="city"
                v-model="formData.city"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.city" class="mt-2" />
        </div>

        <div>
            <InputLabel for="state" value="State" />

            <TextInput
                id="state"
                v-model="formData.state"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.state" class="mt-2" />
        </div>
    </div>
</template>
