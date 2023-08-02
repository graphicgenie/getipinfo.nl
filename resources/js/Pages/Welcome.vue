<script setup>
import { Head, Link } from '@inertiajs/vue3';
import {onMounted, ref} from "vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

let ipv4 = ref('...')
let ipv6 = ref('...')

const getIPv4 = () => {
    axios
        .request({
            timeout: 500,
            method: "GET",
            url: 'https://ipv4.getipinfo.nl/api/ip'
        })
        .then(function (response) {
            ipv4.value = response.data.ip
        })
        .catch(function (error) {
            ipv4.value = 'Niet gevonden'
        })
}

const getIPv6 = () => {
    axios
        .request({
            timeout: 500,
            method: "GET",
            url: 'https://ipv6.getipinfo.nl/api/ip'
        })
        .then(function (response) {
            ipv6.value = response.data.ip
        })
        .catch(function (error) {
            ipv6.value = 'Niet gevonden'
        })
}

getIPv4()
getIPv6()

</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <p class="text-white text-xl">IP Version 4: {{ ipv4 }}</p>
            <p class="text-white text-xl">IP Version 6: {{ ipv6 }}</p>
        </div>
    </div>
</template>

