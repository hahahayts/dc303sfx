<script setup>
import { Head } from "@inertiajs/vue3";
import PageLayout from "../PageLayout.vue";
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
        <div class="wrapper p-5">
            <div class="form">
                <form
                    @submit.prevent="submit"
                    class="w-1/2 flex flex-col gap-3 shadow-lg py-6 px-8"
                >
                    <h1 class="text-center text-3xl font-bold mb-5">
                        Add Investors
                    </h1>

                    <div class="inputs">
                        <label for="lastname">Lastname:</label>
                        <input
                            type="text"
                            id="lastname"
                            v-model="form.last_name"
                        />
                    </div>
                    <p class="error">{{ form.errors.last_name }}</p>

                    <div class="inputs">
                        <label for="first_name">first_name:</label>
                        <input
                            type="text"
                            id="first_name"
                            v-model="form.first_name"
                        />
                    </div>
                    <p class="error">{{ form.errors.last_name }}</p>

                    <div class="inputs">
                        <label for="address">address:</label>
                        <input
                            type="text"
                            id="address"
                            v-model="form.address"
                        />
                    </div>
                    <p class="error">{{ form.errors.last_name }}</p>
                    <div class="inputs">
                        <label for="phone">phone:</label>
                        <input type="text" id="phone" v-model="form.phone" />
                    </div>
                    <p class="error">{{ form.errors.last_name }}</p>

                    <div>
                        <label for="category">Investor Type</label>
                        <select
                            name="category"
                            id="category"
                            v-model="form.investment_type"
                        >
                            <option value="micro">micro</option>
                            <option value="sponsor">sponsor</option>
                            <option value="benefactor">benefactor</option>
                        </select>
                    </div>

                    <button
                        type="submit"
                        class="inline-block mx-auto border border-gray-900 py-2 px-5 rounded-md transform transition-all hover:bg-gray-900 hover:text-white text-sm font-semibold duration-100 mt-5"
                    >
                        Add
                    </button>
                </form>
            </div>
        </div>
    </PageLayout>
</template>
