<script setup>
import { Head } from "@inertiajs/vue3";
import PageLayout from "../PageLayout.vue";
import { Link } from "@inertiajs/vue3";

const a = defineProps({
    investors: {
        type: Object,
        required: true,
    },
});

console.log(a);
</script>

<template>
    <Head title="Investors" />

    <PageLayout>
        <div class="flex justify-end my-2">
            <Link
                href="/investors/add"
                class="bg-green-500 text-white font-semibold py-2 px-5 rounded-lg"
            >
                Add investors
            </Link>
        </div>
        <ul class="container mx-auto grid grid-cols-3 gap-4 px-4 py-3">
            <li
                v-for="investor in investors.data"
                :key="investor.id"
                class="bg-white p-5 rounded-lg text-center"
            >
                <h1 class="text-xl font-semibold text-gray-800">
                    {{ investor.last_name }}, {{ investor.first_name }}
                </h1>
                <h3>{{ investor.address }}</h3>
                <h3>{{ investor.investment_type }}</h3>
                <h3>{{ investor.phone }}</h3>
            </li>
        </ul>

        <div class="flex justify-end mt-3">
            <div>
                <Link :href="investors.first_page_url"
                    ><i class="bi bi-chevron-double-left"></i
                ></Link>
                <!-- <Link :href="investors.prev_page_url"
                    ><i class="bi bi-chevron-compact-left"></i
                ></Link> -->
                <span
                    >Page {{ investors.current_page }} of
                    {{ investors.last_page }}
                </span>
                <Link :href="investors.next_page_url"
                    ><i class="bi bi-chevron-compact-right"></i
                ></Link>
                <Link :href="investors.last_page_url"
                    ><i class="bi bi-chevron-double-right"></i
                ></Link>
            </div>
        </div>
    </PageLayout>
</template>
