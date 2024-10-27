<script setup lang="ts">
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    formData: {
        type: Object,
        required: true,
    },
});
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
                id="document"
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

        <div>
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
                id="zipcode"
                v-model="formData.zipcode"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.zipcode" class="mt-2" />
        </div>
    </div>

    <div class="grid gap-6 mb-6 md:grid-cols-6">
        <div class="col-span-3">
            <InputLabel for="adress" value="Adress" />

            <TextInput
                id="adress"
                v-model="formData.adress"
                type="text"
                class="mt-1 block w-full"
            />

            <InputError :message="formData.errors.adress" class="mt-2" />
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
