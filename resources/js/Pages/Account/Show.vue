<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import ActionSection from '@/Components/ActionSection.vue'
import { CheckIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
    subscription: Object,
    subscriptions: Object,
    has_subscription: Boolean,
})
</script>

<template>
    <!--    <AppLayout>-->
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <ActionSection class="mt-4">
            <template #title>Your subscription</template>

            <template #description
                >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </template>
            <template #content>
                <div v-if="!has_subscription">
                    <div>Current plan: Free</div>
                    <div class="flex flex-col mt-2">
                        <span class="text-2xl font-bold tracking-tight text-gray-900">€0,00</span>
                        <small>per month</small>
                    </div>
                    <div>
                        <ul role="list" class="mt-8 text-sm leading-6 text-gray-600 sm:gap-6">
                            <li class="flex gap-x-3"><CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />Unlimited IP lookups</li>
                            <li class="flex gap-x-3"><CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />10 GeoIP request per month</li>
                            <li class="flex gap-x-3"><CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" />No support</li>
                        </ul>
                    </div>
                </div>
                <div v-else>
                    <div>Current plan: {{ subscriptions[subscription.stripe_price].name }}</div>
                    <div class="flex flex-col mt-2">
                        <span class="text-2xl font-bold tracking-tight text-gray-900">€ {{ subscriptions[subscription.stripe_price].price.monthly }}.00</span>
                        <small>per month</small>
                    </div>
                    <div>
                        <ul role="list" class="mt-8 text-sm leading-6 text-gray-600 sm:gap-6">
                            <li v-for="feature in subscriptions[subscription.stripe_price].features" class="flex gap-x-3">
                                <CheckIcon class="h-6 w-5 flex-none text-indigo-600" aria-hidden="true" /> {{ feature }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4">
                    <a
                        v-if="has_subscription"
                        :href="route('billing-portal')"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >Manage subscription</a
                    >
                    <a
                        href="#"
                        class="ml-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 float-right"
                        >View all Plans</a
                    >
                    <a
                        :href="route('stripe-basic')"
                        class="float-right inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    >
                        <span v-if="!has_subscription">Upgrade to Basic</span>
                        <span v-else-if="subscriptions[subscription.stripe_price].id === 'tier-basic'">Upgrade to Standard</span>
                        <span v-else-if="subscriptions[subscription.stripe_price].id === 'tier-standard'">Upgrade to Business</span>
                    </a>
                    <span class="clearfix">&nbsp;</span>
                </div>
            </template>
        </ActionSection>
        <!--            <ActionSection class="mt-4">-->
        <!--                <template #title>Invoices</template>-->

        <!--                <template #description></template>-->
        <!--                <template #content></template>-->
        <!--            </ActionSection>-->
    </div>
    <!--    </AppLayout>-->
</template>
