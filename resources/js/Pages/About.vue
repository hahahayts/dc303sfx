<script setup>
import { Head } from "@inertiajs/vue3";
import PageLayout from "./PageLayout.vue";
</script>

<template>
    <Head title="About Page" />

    <PageLayout>
        <div class="min-h-screen w-full flex items-center justify-center">
            <div class="w-1/3 bg-white rounded-xl text-center p-5 space-y-3">
                <h1 class="text-3xl font-semibold">John Jeric Polison</h1>
                <h2 class="text-xl font-semibold">BSIT - 3</h2>
                <h3 class="text-lg font-semibold">09510776203</h3>
            </div>
        </div>
    </PageLayout>
</template>
