<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import { defineComponent, h } from 'vue'
import { ArrowPathIcon, CloudArrowUpIcon, FingerPrintIcon, LockClosedIcon } from '@heroicons/vue/24/outline'
import { CheckIcon } from '@heroicons/vue/20/solid'
import { DialogOverlay, RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import Default from '@/Layouts/Default.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

defineOptions({
    layout: Default,
})

const navigation = {
    solutions: [
        { name: 'Marketing', href: '#' },
        { name: 'Analytics', href: '#' },
        { name: 'Commerce', href: '#' },
        { name: 'Insights', href: '#' },
    ],
    support: [
        { name: 'Pricing', href: '#' },
        { name: 'Documentation', href: '#' },
        { name: 'Guides', href: '#' },
        { name: 'API Status', href: '#' },
    ],
    company: [
        { name: 'About', href: '#' },
        { name: 'Blog', href: '#' },
        { name: 'Jobs', href: '#' },
        { name: 'Press', href: '#' },
        { name: 'Partners', href: '#' },
    ],
    legal: [
        { name: 'Claim', href: '#' },
        { name: 'Privacy', href: '#' },
        { name: 'Terms', href: '#' },
    ],
    social: [
        {
            name: 'Facebook',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d: 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Instagram',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d: 'M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Twitter',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            d: 'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84',
                        }),
                    ]),
            }),
        },
        {
            name: 'GitHub',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d: 'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'YouTube',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d: 'M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
    ],
}
const frequencies = [
    { value: 'monthly', label: 'Monthly', priceSuffix: '/month' },
    { value: 'annually', label: 'Annually', priceSuffix: '/year' },
]
const tiers = [
    {
        name: 'Free',
        id: 'tier-free',
        href: route('register'),
        price: { monthly: '0', annually: '0' },
        description: '',
        features: ['Unlimited IP lookups', '10 GeoIP request per month', 'No support'],
        mostPopular: false,
    },
    {
        name: 'Basic',
        id: 'tier-basic',
        href: route('stripe-basic'),
        price: { monthly: '€9', annually: '€100' },
        description: '',
        features: ['Unlimited IP lookups', '10000 GeoIP request per month', 'Includes ASN', 'Basic support'],
        mostPopular: false,
    },
    {
        name: 'Standard',
        id: 'tier-standard',
        href: route('stripe-standard'),
        price: { monthly: '€25', annually: '€255' },
        description: '',
        features: ['Unlimited IP lookups', '50000 GeoIP request per month', 'Includes ASN', 'Basic support'],
        mostPopular: true,
    },
    {
        name: 'Business',
        id: 'tier-business',
        href: route('stripe-business'),
        price: { monthly: '€89', annually: '€949' },
        description: '',
        features: ['Unlimited IP lookups', '200000 GeoIP request per month', 'Includes ASN', 'Premium support'],
        mostPopular: false,
    },
]

const frequency = ref(frequencies[0])

const features = [
    {
        name: 'Push to deploy',
        description: 'Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi. Odio urna massa nunc massa.',
        icon: CloudArrowUpIcon,
    },
    {
        name: 'SSL certificates',
        description: 'Sit quis amet rutrum tellus ullamcorper ultricies libero dolor eget. Sem sodales gravida quam turpis enim lacus amet.',
        icon: LockClosedIcon,
    },
    {
        name: 'Simple queues',
        description: 'Quisque est vel vulputate cursus. Risus proin diam nunc commodo. Lobortis auctor congue commodo diam neque.',
        icon: ArrowPathIcon,
    },
    {
        name: 'Advanced security',
        description: 'Arcu egestas dolor vel iaculis in ipsum mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.',
        icon: FingerPrintIcon,
    },
]

let ipv4 = ref('...')
let ipv6 = ref('...')

const getIPv4 = () => {
    axios
        .request({
            timeout: 500,
            method: 'GET',
            url: 'https://ipv4.getipinfo.nl/api/ip',
        })
        .then(function (response) {
            ipv4.value = response.data.ip
        })
        .catch(function (error) {
            ipv4.value = 'Not found'
        })
}

const getIPv6 = () => {
    axios
        .request({
            timeout: 500,
            method: 'GET',
            url: 'https://ipv6.getipinfo.nl/api/ip',
        })
        .then(function (response) {
            ipv6.value = response.data.ip
        })
        .catch(function (error) {
            ipv6.value = 'Not found'
        })
}

getIPv4()
getIPv6()
</script>

<template>
    <Head title="Welcome" />

    <div class="relative isolate overflow-hidden bg-gray-900">
        <div class="sm:absolute sm:top-0 sm:left-0 p-6 text-left text-white">
            <div>Your IPv4: {{ ipv4 }}</div>
            <div>Your IPv6: {{ ipv6 }}</div>
        </div>
        <div class="sm:absolute sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >
            <div v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </div>
        </div>
        <svg
            class="absolute inset-0 -z-10 h-full w-full stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
            aria-hidden="true"
        >
            <defs>
                <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible fill-gray-800/20">
                <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
        </svg>
        <div
            class="absolute left-[calc(50%-4rem)] top-10 -z-10 transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
            aria-hidden="true"
        >
            <div
                class="aspect-[1108/632] w-[69.25rem] bg-gradient-to-r from-[#80caff] to-[#4f46e5] opacity-20"
                style="
                    clip-path: polygon(
                        73.6% 51.7%,
                        91.7% 11.8%,
                        100% 46.4%,
                        97.4% 82.2%,
                        92.5% 84.9%,
                        75.7% 64%,
                        55.3% 47.5%,
                        46.5% 49.4%,
                        45% 62.9%,
                        50.3% 87.2%,
                        21.3% 64.1%,
                        0.1% 100%,
                        5.4% 51.1%,
                        21.4% 63.9%,
                        58.9% 0.2%,
                        73.6% 51.7%
                    );
                "
            />
        </div>
        <div class="mx-auto max-w-7xl px-6 pb-24 pt-10 sm:pb-32 lg:flex lg:px-8 lg:py-40">
            <div class="mx-auto max-w-2xl flex-shrink-0 lg:mx-0 lg:max-w-xl lg:pt-8">
                <div class="mt-24 sm:mt-32 lg:mt-16">
                    <svg viewBox="0 0 369.9130434782609 98.33118465360793" preserveAspectRatio="xMidYMid meet" class="w-1/2 mb-8" id="egbdbagf">
                        <defs id="SvgjsDefs1011"></defs>
                        <g
                            id="SvgjsG1012"
                            featurekey="symbolFeature-0"
                            transform="matrix(1.005297671013208,0,0,1.005297671013208,-13.051779463349353,-1.005297671013208)"
                            fill="#fff"
                        >
                            <g xmlns="http://www.w3.org/2000/svg">
                                <polygon
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    points="12.983,10.59 30.001,98.813 24.129,39.764 53.15,37.872 53.096,27.989    64.549,1 53.622,18.977  "
                                ></polygon>
                                <polygon
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    points="59.389,54.548 64.549,1.007 55.809,40.723 36.197,41.768 37.767,62.23    30.001,98.813 42.058,58.914  "
                                ></polygon>
                                <polygon
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    points="62.8,67.182 63.349,56.729 47.37,60.484 47.338,72.281 30.001,98.813    51.681,71.197  "
                                ></polygon>
                                <polygon fill-rule="evenodd" clip-rule="evenodd" points="65.711,62.394 80.552,57.663 82.061,45.131 66.162,47.226  "></polygon>
                                <polygon
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    points="72.07,44.502 83.058,43.085 84.639,32.807 76.56,32.434 64.549,1    72.979,31.967  "
                                ></polygon>
                                <polygon
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    points="87.413,31.294 88.669,21.788 79.125,19.094 64.549,1 79.032,23.437    78.61,30.437  "
                                ></polygon>
                            </g>
                        </g>
                        <g
                            id="SvgjsG1013"
                            featurekey="nameFeature-0"
                            transform="matrix(0.7732866165307051,0,0,0.7732866165307051,92.61702702622648,33.973075320149846)"
                            fill="#fff"
                        >
                            <path
                                d="M21.875 22.891 l13.828 0 l0 -5.7813 l-13.828 0 l0 5.7813 z M35.703 27.422 l-5.7813 0.000076294 l0 5.3125 l-5.7031 0 c-1.9791 0 -3.75 -0.3125 -5.3125 -0.9375 c-1.5625 -0.57289 -2.9427 -1.4323 -4.1406 -2.5781 c-1.0938 -1.1979 -1.9531 -2.552 -2.5781 -4.0624 c-0.625 -1.4584 -0.9375 -3.1511 -0.9375 -5.0782 c0 -1.8229 0.3125 -3.5156 0.9375 -5.0781 c0.67711 -1.6666 1.5365 -3.0208 2.5781 -4.0624 c1.1459 -1.1459 2.5261 -2.0573 4.1407 -2.7345 c1.5625 -0.625 3.3334 -0.9375 5.3125 -0.9375 l11.406 0.078125 l0 -5.9375 l-11.406 -0.078125 c-2.9166 0 -5.5989 0.46875 -8.0469 1.4063 c-2.3959 0.9375 -4.4792 2.2396 -6.2501 3.9063 c-1.7188 1.6666 -3.099 3.6458 -4.1406 5.9374 c-0.9375 2.2396 -1.4063 4.6875 -1.4063 7.3438 s0.46875 5.1302 1.4063 7.4219 c1.0416 2.3959 2.4219 4.375 4.1406 5.9375 c1.5625 1.5625 3.6459 2.8906 6.25 3.9844 c2.5 0.9375 5.1823 1.4063 8.0469 1.4063 l11.484 0 l0 -11.25 z M46.0938 1.4059999999999988 l27.813 0 l0 5.9375 l-27.813 0 l0 -5.9375 z M46.0938 32.6562 l27.734 0 l0 5.9375 l-27.734 0 l0 -5.9375 z M46.0938 16.875 l25.078 0 l0 5.8594 l-25.078 0 l0 -5.8594 z M103.281 7.5 l11.797 0 l0 -6.0938 l-30.156 0 l0 6.0938 l18.359 0 z M96.719 13.594000000000001 l6.5625 0 l0 25 l-6.5625 0 l0 -25 z M143.281 16.875 l0 -15.547 l-6.5625 0 l0 37.344 l6.5625 0 l0 -21.797 z M193.438 8.75 c-0.67711 -1.4584 -1.6147 -2.7605 -2.8126 -3.9063 c-1.25 -1.0938 -2.7344 -1.9531 -4.4531 -2.5781 c-1.875 -0.57289 -3.8541 -0.85938 -5.9375 -0.85938 l-14.609 0 l0 5.8594 l14.063 0 c2.3438 0 4.2969 0.57289 5.8594 1.7188 c1.4584 1.0938 2.1875 2.7604 2.1875 5 c0 2.0313 -0.70313 3.6719 -2.1094 4.9219 c-1.5104 1.1979 -3.4895 1.7969 -5.9374 1.7969 l-14.063 0 l0 17.891 l6.4844 0 l0 -11.953 l7.3438 0 c1.9271 0 3.8802 -0.28648 5.8594 -0.85938 c1.8229 -0.57289 3.3854 -1.3802 4.6875 -2.4218 c1.3541 -1.0416 2.4219 -2.3698 3.2031 -3.9844 c0.78125 -1.5625 1.1719 -3.3854 1.1719 -5.4688 c0 -1.9791 -0.3125 -3.6979 -0.9375 -5.1563 z M223.281 16.875 l0 -15.547 l-6.5625 0 l0 37.344 l6.5625 0 l0 -21.797 z M243.8281 38.5937 l6.4844 0 l0 -19.922 l-6.4844 -9.1406 l0 29.063 z M269.766 1.4059999999999988 l0 25.703 l-18.359 -25.703 l-7.0313 0 l26.406 37.188 l5.3906 0 l0 -37.188 l-6.4063 0 z M286.0938 1.4059999999999988 l27.813 0 l0 5.9375 l-27.813 0 l0 -5.9375 z M286.0938 16.875 l5.9375 0 l0 21.719 l-5.9375 0 l0 -21.719 z M286.0938 16.875 l25.078 0 l0 5.8594 l-25.078 0 l0 -5.8594 z M337.344 32.6562 c-0.78125 -0.15625 -1.5105 -0.3907 -2.1876 -0.7032 c-1.4584 -0.67711 -2.7344 -1.6146 -3.8281 -2.8125 c-1.0416 -1.0938 -1.875 -2.4479 -2.5 -4.0625 c-0.57289 -1.6146 -0.85938 -3.2552 -0.85938 -4.9219 l0 -0.15625 l0 -0.23438 c0 -1.7188 0.28648 -3.3854 0.85938 -5 c0.67711 -1.6666 1.5105 -2.9948 2.5001 -3.9844 c1.0416 -1.1979 2.2916 -2.1094 3.75 -2.7344 c0.88539 -0.41664 1.6406 -0.67703 2.2656 -0.78117 l0 -5.8594 c-1.8229 0.26039 -3.4375 0.70313 -4.8438 1.3281 c-2.2916 0.98961 -4.2448 2.3177 -5.8594 3.9844 s-2.8906 3.6458 -3.8281 5.9374 s-1.4063 4.6875 -1.4063 7.1875 l0 0.15625 l0 0.23438 c0 2.5521 0.46875 4.948 1.4063 7.1876 c0.83336 2.2396 2.0834 4.1927 3.75 5.8594 c1.6666 1.7188 3.6198 3.0469 5.8594 3.9844 c1.4063 0.625 3.0469 1.0677 4.9219 1.3281 l0 -5.9375 z M358.594 20 l0.000076294 -0.23438 c0 -2.5521 -0.46875 -4.948 -1.4063 -7.1876 c-0.9375 -2.2916 -2.2135 -4.2708 -3.8281 -5.9374 c-1.5625 -1.6666 -3.4896 -2.9688 -5.7813 -3.9063 c-1.3021 -0.625 -2.8906 -1.0677 -4.7656 -1.3281 l0 5.9375 l0.9375 0.3125 c0.46875 0.15625 0.83336 0.28648 1.0938 0.39063 c1.4584 0.67711 2.7344 1.6146 3.8281 2.8125 c1.0416 1.0938 1.875 2.4479 2.5 4.0625 c0.57289 1.6146 0.85938 3.2552 0.85938 4.9219 l0 0.15625 l0 0.23438 c0 1.7188 -0.28648 3.3854 -0.85938 5 c-0.67711 1.6666 -1.5105 2.9948 -2.5001 3.9844 c-1.0416 1.1979 -2.2916 2.1094 -3.75 2.7344 c-0.67711 0.3125 -1.3802 0.54688 -2.1094 0.70313 l0 5.9375 c1.5625 -0.20836 3.125 -0.65109 4.6875 -1.3282 c2.1354 -0.88539 4.0885 -2.2135 5.8594 -3.9844 c1.7188 -1.8229 2.9948 -3.802 3.8281 -5.9374 c0.9375 -2.2916 1.4063 -4.6875 1.4063 -7.1875 l0 -0.15625 z"
                            ></path>
                        </g>
                    </svg>
                    <a href="#" class="inline-flex space-x-6 hidden">
                        <span
                            class="rounded-full bg-indigo-500/10 px-3 py-1 text-sm font-semibold leading-6 text-indigo-400 ring-1 ring-inset ring-indigo-500/20"
                            >What's new</span
                        >
                        <span class="inline-flex items-center space-x-2 text-sm font-medium leading-6 text-gray-300">
                            <span>Just shipped v1.0</span>
                            <ChevronRightIcon class="h-5 w-5 text-gray-500" aria-hidden="true" />
                        </span>
                    </a>
                </div>
                <h1 class="mt-10 text-4xl font-bold tracking-tight text-white sm:text-6xl">Get to know your customer</h1>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat
                    aliqua.
                </p>
                <div class="mt-10 flex items-center gap-x-6">
                    <a
                        href="#"
                        class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400"
                        >Get started</a
                    >
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
                </div>
            </div>
            <div class="mx-auto mt-16 flex max-w-2xl sm:mt-24 lg:ml-10 lg:mr-0 lg:mt-0 lg:max-w-none lg:flex-none xl:ml-32">
                <div class="shadow-lg md:rounded-3xl">
                    <div class="bg-indigo-500 [clip-path:inset(0)] md:[clip-path:inset(0_round_theme(borderRadius.3xl))]">
                        <div
                            class="absolute -inset-y-px left-1/2 -z-10 ml-10 w-[200%] skew-x-[-30deg] bg-indigo-100 opacity-20 ring-1 ring-inset ring-white md:ml-20 lg:ml-36"
                            aria-hidden="true"
                        />
                        <div class="relative px-6 pt-8 sm:pt-16 md:pl-16 md:pr-0">
                            <div class="mx-auto max-w-2xl md:mx-0 md:max-w-none">
                                <div class="w-screen overflow-hidden rounded-tl-xl bg-gray-900">
                                    <div class="flex bg-gray-800/40 ring-1 ring-white/5">
                                        <div class="-mb-px flex text-sm font-medium leading-6 text-gray-400">
                                            <div class="border-b border-r border-b-white/20 border-r-white/10 bg-white/5 px-4 py-2 text-white">
                                                curl -H "Authorization: Bearer gRCn3S47zUyYvr" https://getipinfo.nl/api/geoip/8.8.8.8
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-6 pb-14 pt-6">
                                        <code class="text-white">
                                            <div>{</div>
                                            <div class="indent-6">"ip": "8.8.8.8",</div>
                                            <div class="indent-6">"hostname": "dns.google",</div>
                                            <div class="indent-6">"city": "Los Angeles",</div>
                                            <div class="indent-6">"country": "United States",</div>
                                            <div class="indent-6">"country_iso": "US",</div>
                                            <div class="indent-6">"continent": "North America",</div>
                                            <div class="indent-6">"continent_code": "NA",</div>
                                            <div class="indent-6">"latitude": 34.0544,</div>
                                            <div class="indent-6">"longitude": -118.2441,</div>
                                            <div class="indent-6">"time_zone": "America/Los_Angeles",</div>
                                            <div class="indent-6">"postal": "90009",</div>
                                            <div class="indent-6">"province": "California",</div>
                                            <div class="indent-6">"province_iso": "CA",</div>
                                            <div class="indent-6">"asn": {</div>
                                            <div class="indent-12">"number": 15169,</div>
                                            <div class="indent-12">"organization": "GOOGLE",</div>
                                            <div class="indent-12">"domain": google.com,</div>
                                            <div class="indent-12">"isp": "Google",</div>
                                            <div class="indent-12">"network": "8.8.8.8/32"</div>
                                            <div class="indent-6">}</div>
                                            <div>}</div>
                                        </code>
                                    </div>
                                </div>
                            </div>
                            <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 md:rounded-3xl" aria-hidden="true" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">Deploy faster</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need to deploy your app</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In
                        mi viverra elit nunc.
                    </p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                        <div v-for="feature in features" :key="feature.name" class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-900">
                                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                    <component :is="feature.icon" class="h-6 w-6 text-white" aria-hidden="true" />
                                </div>
                                {{ feature.name }}
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-gray-900 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-400">Pricing</h2>
                    <p class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">Pricing plans for all sizes</p>
                </div>
                <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-300">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                    since the 1500s
                </p>
                <div class="mt-16 flex justify-center">
                    <RadioGroup
                        v-model="frequency"
                        class="grid grid-cols-2 gap-x-1 rounded-full bg-white/5 p-1 text-center text-xs font-semibold leading-5 text-white"
                    >
                        <RadioGroupLabel class="sr-only">Payment frequency</RadioGroupLabel>
                        <RadioGroupOption as="template" v-for="option in frequencies" :key="option.value" :value="option" v-slot="{ checked }">
                            <div :class="[checked ? 'bg-indigo-500' : '', 'cursor-pointer rounded-full px-2.5 py-1']">
                                <span>{{ option.label }}</span>
                            </div>
                        </RadioGroupOption>
                    </RadioGroup>
                </div>
                <div class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-4">
                    <div
                        v-for="tier in tiers"
                        :key="tier.id"
                        :class="[tier.mostPopular ? 'bg-white/5 ring-2 ring-indigo-500' : 'ring-1 ring-white/10', 'rounded-3xl p-8 xl:p-10']"
                    >
                        <div class="flex items-center justify-between gap-x-4">
                            <h3 :id="tier.id" class="text-lg font-semibold leading-8 text-white">{{ tier.name }}</h3>
                            <p v-if="tier.mostPopular" class="rounded-full bg-indigo-500 px-2.5 py-1 text-xs font-semibold leading-5 text-white">
                                Most popular
                            </p>
                        </div>
                        <p class="mt-4 text-sm leading-6 text-gray-300">{{ tier.description }}</p>
                        <p v-if="tier.price.monthly !== '0'" class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">{{ tier.price[frequency.value] }}</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">{{ frequency.priceSuffix }}</span>
                        </p>
                        <p v-else class="mt-6 flex items-baseline gap-x-1">
                            <span class="text-4xl font-bold tracking-tight text-white">Free</span>
                            <span class="text-sm font-semibold leading-6 text-gray-300">/forever</span>
                        </p>
                        <a
                            :href="tier.href"
                            :aria-describedby="tier.id"
                            :class="[
                                tier.mostPopular
                                    ? 'bg-indigo-500 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline-indigo-500'
                                    : 'bg-white/10 text-white hover:bg-white/20 focus-visible:outline-white',
                                'mt-6 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2',
                            ]"
                            ><span v-if="tier.price.monthly !== '0'">Buy plan</span><span v-else>Sign Up</span></a
                        >
                        <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 xl:mt-10">
                            <li v-for="feature in tier.features" :key="feature" class="flex gap-x-3">
                                <CheckIcon class="h-6 w-5 flex-none text-white" aria-hidden="true" />
                                {{ feature }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="mx-auto max-w-7xl px-6 pb-8 pt-20 sm:pt-24 lg:px-8 lg:pt-32">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold leading-6 text-gray-900">Solutions</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li v-for="item in navigation.solutions" :key="item.name">
                                        <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ item.name }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-10 md:mt-0">
                                <h3 class="text-sm font-semibold leading-6 text-gray-900">Support</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li v-for="item in navigation.support" :key="item.name">
                                        <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ item.name }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold leading-6 text-gray-900">Company</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li v-for="item in navigation.company" :key="item.name">
                                        <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ item.name }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-10 md:mt-0">
                                <h3 class="text-sm font-semibold leading-6 text-gray-900">Legal</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li v-for="item in navigation.legal" :key="item.name">
                                        <a :href="item.href" class="text-sm leading-6 text-gray-600 hover:text-gray-900">{{ item.name }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 xl:mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-gray-900">Subscribe to our newsletter</h3>
                        <p class="mt-2 text-sm leading-6 text-gray-600">The latest news, articles, and resources, sent to your inbox weekly.</p>
                        <form class="mt-6 sm:flex sm:max-w-md">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input
                                type="email"
                                name="email-address"
                                id="email-address"
                                autocomplete="email"
                                required=""
                                class="w-full min-w-0 appearance-none rounded-md border-0 bg-white px-3 py-1.5 text-base text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:w-64 sm:text-sm sm:leading-6 xl:w-full"
                                placeholder="Enter your email"
                            />
                            <div class="mt-4 sm:ml-4 sm:mt-0 sm:flex-shrink-0">
                                <button
                                    type="submit"
                                    class="flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                >
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-16 border-t border-gray-900/10 pt-8 sm:mt-20 md:flex md:items-center md:justify-between lg:mt-24">
                    <div class="flex space-x-6 md:order-2">
                        <a v-for="item in navigation.social" :key="item.name" :href="item.href" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">{{ item.name }}</span>
                            <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                        </a>
                    </div>
                    <p class="mt-8 text-xs leading-5 text-gray-500 md:order-1 md:mt-0">&copy; 2020 Your Company, Inc. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <p class="text-white text-xl">IP Version 4: {{ ipv4 }}</p>
        <p class="text-white text-xl">IP Version 6: {{ ipv6 }}</p>
    </div>
</template>
