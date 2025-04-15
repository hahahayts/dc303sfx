<script setup>
import { Head } from "@inertiajs/vue3";
import PageLayout from "../PageLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    investors: {
        type: Object,
        required: true,
    },
});

// Get investment type badge color
const getInvestmentTypeColor = (type) => {
    switch (type) {
        case "micro":
            return "bg-blue-100 text-blue-800";
        case "sponsor":
            return "bg-green-100 text-green-800";
        case "benefactor":
            return "bg-purple-100 text-purple-800";
        default:
            return "bg-gray-100 text-gray-800";
    }
};
</script>

<template>
    <Head title="Investors" />

    <PageLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Investors</h1>
                <Link
                    href="/investors/add"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    Add Investor
                </Link>
            </div>

            <div
                v-if="investors.data.length === 0"
                class="bg-white rounded-lg shadow p-8 text-center"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-16 w-16 mx-auto text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                    />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">
                    No investors found
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Get started by adding your first investor.
                </p>
            </div>

            <div
                v-else
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
            >
                <div
                    v-for="investor in investors.data"
                    :key="investor.id"
                    class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow"
                >
                    <div class="border-b border-gray-200 bg-gray-50 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ investor.first_name }} {{ investor.last_name }}
                        </h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-start">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-400 mr-3 mt-0.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                            <span class="text-gray-600">{{
                                investor.address
                            }}</span>
                        </div>

                        <div class="flex items-start">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-400 mr-3 mt-0.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>
                            <span class="text-gray-600">{{
                                investor.phone
                            }}</span>
                        </div>

                        <div class="pt-2">
                            <span
                                :class="[
                                    'inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium capitalize',
                                    getInvestmentTypeColor(
                                        investor.investment_type
                                    ),
                                ]"
                            >
                                {{ investor.investment_type }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div
                class="mt-8 flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-lg shadow"
            >
                <div class="flex flex-1 justify-between sm:hidden">
                    <Link
                        :href="investors.prev_page_url || '#'"
                        :class="[
                            investors.prev_page_url
                                ? 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50'
                                : 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed',
                            'relative inline-flex items-center rounded-md border px-4 py-2 text-sm font-medium',
                        ]"
                        :tabindex="investors.prev_page_url ? 0 : -1"
                    >
                        Previous
                    </Link>
                    <Link
                        :href="investors.next_page_url || '#'"
                        :class="[
                            investors.next_page_url
                                ? 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50'
                                : 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed',
                            'relative ml-3 inline-flex items-center rounded-md border px-4 py-2 text-sm font-medium',
                        ]"
                        :tabindex="investors.next_page_url ? 0 : -1"
                    >
                        Next
                    </Link>
                </div>
                <div
                    class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
                >
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">{{
                                (investors.current_page - 1) *
                                    investors.per_page +
                                1
                            }}</span>
                            to
                            <span class="font-medium">{{
                                Math.min(
                                    investors.current_page * investors.per_page,
                                    investors.total
                                )
                            }}</span>
                            of
                            <span class="font-medium">{{
                                investors.total
                            }}</span>
                            results
                        </p>
                    </div>
                    <div>
                        <nav
                            class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                            aria-label="Pagination"
                        >
                            <Link
                                :href="investors.first_page_url || '#'"
                                :class="[
                                    investors.current_page > 1
                                        ? 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                                        : 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed',
                                    'relative inline-flex items-center rounded-l-md border px-2 py-2 text-sm font-medium',
                                ]"
                                :tabindex="investors.current_page > 1 ? 0 : -1"
                            >
                                <span class="sr-only">First page</span>
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        d="M6.29 5.23a.75.75 0 01-.02 1.06L2.332 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="investors.prev_page_url || '#'"
                                :class="[
                                    investors.current_page > 1
                                        ? 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                                        : 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed',
                                    'relative inline-flex items-center border px-2 py-2 text-sm font-medium',
                                ]"
                                :tabindex="investors.current_page > 1 ? 0 : -1"
                            >
                                <span class="sr-only">Previous</span>
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>

                            <span
                                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700"
                            >
                                Page {{ investors.current_page }} of
                                {{ investors.last_page }}
                            </span>

                            <Link
                                :href="investors.next_page_url || '#'"
                                :class="[
                                    investors.current_page < investors.last_page
                                        ? 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                                        : 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed',
                                    'relative inline-flex items-center border px-2 py-2 text-sm font-medium',
                                ]"
                                :tabindex="
                                    investors.current_page < investors.last_page
                                        ? 0
                                        : -1
                                "
                            >
                                <span class="sr-only">Next</span>
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                            <Link
                                :href="investors.last_page_url || '#'"
                                :class="[
                                    investors.current_page < investors.last_page
                                        ? 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                                        : 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed',
                                    'relative inline-flex items-center rounded-r-md border px-2 py-2 text-sm font-medium',
                                ]"
                                :tabindex="
                                    investors.current_page < investors.last_page
                                        ? 0
                                        : -1
                                "
                            >
                                <span class="sr-only">Last page</span>
                                <svg
                                    class="h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        d="M13.71 14.77a.75.75 0 01.02-1.06L17.668 10 13.73 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </Link>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
