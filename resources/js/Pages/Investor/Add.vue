<script setup>
import { Head } from "@inertiajs/vue3";
import PageLayout from "../PageLayout.vue";
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    last_name: "",
    first_name: "",
    address: "",
    investor_type: "",
    phone: "",
});

const submit = () => {
    form.post("/investors");
};
</script>

<template>
    <Head title="Add Investors" />

    <PageLayout>
        <div class="max-w-4xl mx-auto py-12 px-4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800">
                        Add Investor
                    </h1>
                </div>

                <form @submit.prevent="submit" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label
                                for="first_name"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                First Name
                            </label>
                            <input
                                type="text"
                                id="first_name"
                                v-model="form.first_name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter first name"
                            />
                            <p
                                v-if="form.errors.first_name"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.first_name }}
                            </p>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label
                                for="last_name"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Last Name
                            </label>
                            <input
                                type="text"
                                id="last_name"
                                v-model="form.last_name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter last name"
                            />
                            <p
                                v-if="form.errors.last_name"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.last_name }}
                            </p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <label
                            for="address"
                            class="block text-sm font-medium text-gray-700 mb-1"
                        >
                            Address
                        </label>
                        <input
                            type="text"
                            id="address"
                            v-model="form.address"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter full address"
                        />
                        <p
                            v-if="form.errors.address"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.address }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Phone -->
                        <div>
                            <label
                                for="phone"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Phone Number
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                v-model="form.phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter phone number"
                            />
                            <p
                                v-if="form.errors.phone"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.phone }}
                            </p>
                        </div>

                        <!-- Investor Type -->
                        <div>
                            <label
                                for="investor_type"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Investor Type
                            </label>
                            <select
                                id="investor_type"
                                v-model="form.investor_type"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white"
                            >
                                <option value="" disabled selected>
                                    Select investor type
                                </option>
                                <option value="micro">Micro</option>
                                <option value="sponsor">Sponsor</option>
                                <option value="benefactor">Benefactor</option>
                            </select>
                            <p
                                v-if="form.errors.investor_type"
                                class="mt-1 text-sm text-red-600"
                            >
                                {{ form.errors.investor_type }}
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <Link
                            href="/investors"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md mr-3 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            :disabled="form.processing"
                        >
                            {{ form.processing ? "Adding..." : "Add Investor" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </PageLayout>
</template>
