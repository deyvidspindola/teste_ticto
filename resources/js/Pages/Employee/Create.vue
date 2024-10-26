<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    document: "",
    email: "",
    password: "",
    role: "",
    born_date: "",
    zipcode: "",
    district: "",
    city: "",
    state: "",
    adress: "",
    number: "",
    complement: "",
});

const createNewEmployee = () => {
    form.post(route("employee.store"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {},
    });
};

const goBack = () => {
    router.get(route("employees"));
};
</script>

<template>
    <Head title="Employees" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                New Employee
            </h2>
            <PrimaryButton @click="goBack()"> Prev </PrimaryButton>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form
                            @submit.prevent="createNewEmployee"
                            class="mt-6 space-y-6"
                        >
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <InputLabel for="name" value="Name" />

                                    <TextInput
                                        id="name"
                                        v-model="form.name"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.name"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="documment"
                                        value="Document"
                                    />

                                    <TextInput
                                        id="document"
                                        v-model="form.document"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.document"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <InputLabel for="email" value="Email" />

                                    <TextInput
                                        id="email"
                                        v-model="form.email"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.email"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="password"
                                        value="Password"
                                    />

                                    <TextInput
                                        id="password"
                                        v-model="form.password"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.password"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <InputLabel for="role" value="Role" />

                                    <TextInput
                                        id="role"
                                        v-model="form.role"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.role"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="born_date"
                                        value="Bord Date"
                                    />

                                    <TextInput
                                        id="born_date"
                                        v-model="form.born_date"
                                        type="date"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.born_date"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-6 gap-4">
                                <div>
                                    <InputLabel
                                        for="zipcode"
                                        value="Zip Code"
                                    />

                                    <TextInput
                                        id="zipcode"
                                        v-model="form.zipcode"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.zipcode"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-6">
                                <div class="col-span-3">
                                    <InputLabel for="adress" value="Adress" />

                                    <TextInput
                                        id="adress"
                                        v-model="form.adress"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.adress"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="number" value="Number" />

                                    <TextInput
                                        id="number"
                                        v-model="form.number"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.number"
                                        class="mt-2"
                                    />
                                </div>

                                <div class="col-span-2">
                                    <InputLabel
                                        for="complement"
                                        value="Complement"
                                    />

                                    <TextInput
                                        id="complement"
                                        v-model="form.complement"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <InputLabel
                                        for="district"
                                        value="District"
                                    />

                                    <TextInput
                                        id="district"
                                        v-model="form.district"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.district"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="city" value="City" />

                                    <TextInput
                                        id="city"
                                        v-model="form.city"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.city"
                                        class="mt-2"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="state" value="State" />

                                    <TextInput
                                        id="state"
                                        v-model="form.state"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />

                                    <InputError
                                        :message="form.errors.state"
                                        class="mt-2"
                                    />
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >Save</PrimaryButton
                                >

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p
                                        v-if="form.recentlySuccessful"
                                        class="text-sm text-gray-600"
                                    >
                                        Saved.
                                    </p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
