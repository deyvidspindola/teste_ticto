<script setup>
import ListCheckPoints from "@/Components/ListCheckPoints.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router, useForm, usePage } from "@inertiajs/vue3";

const checkpoints = usePage().props.checkpoints;

const form = useForm({});

const doCheckPoint = () => {
    form.post(route("checkpoint.post"), {
        onSuccess: () => {
            router.get(route("checkpoint"));
        },
    });
};
</script>

<template>
    <Head title="CheckPoint" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                CheckPoint
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="flex justify-center p-6 text-gray-900">
                        <PrimaryButton @click="doCheckPoint">
                            CheckPoint
                        </PrimaryButton>
                    </div>
                    <ListCheckPoints :checkpoints="checkpoints" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
