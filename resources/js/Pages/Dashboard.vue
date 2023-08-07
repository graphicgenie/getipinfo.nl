<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import ActionSection from '@/Components/ActionSection.vue'
import CodeBlock from '@/Components/CodeBlock.vue'
import { CheckIcon } from '@heroicons/vue/20/solid'
import { ref } from 'vue'
import { DialogOverlay, RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'

const frequencies = [
    { value: 'monthly', label: 'Monthly', priceSuffix: '/month' },
    { value: 'annually', label: 'Annually', priceSuffix: '/year' },
]
const tiers = [
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
</script>

<template>
    <!--    <AppLayout title="Dashboard">-->

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <ActionSection>
            <template #title>Get Started</template>

            <template #description
                >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br /><br />It has survived not only
                five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br /><br />It was popularised in the 1960s with
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                including versions of Lorem Ipsum.</template
            >
            <template #content>
                <div class="font-bold text-lg mb-4">Make your first request:</div>
                <CodeBlock>
                    <div class="mb-2">
                        curl -H "Authorization: Bearer {api_token}" <span class="text-yellow-500">https://getipinfo.nl/api/geoip/8.8.8.8</span>
                    </div>
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
                </CodeBlock>
            </template>
        </ActionSection>
        <ActionSection class="mt-4">
            <template #title></template>

            <template #description></template>
            <template #content>
                <div class="font-bold text-lg mb-4">Make a request in jQuery</div>
                <CodeBlock>
                    <span>
                        <div>$.ajax({</div>
                        <div class="indent-6">type: "GET",</div>
                        <div class="indent-6">url: "<span class="text-yellow-500">https://getipinfo.nl/api/geoip</span>",</div>
                        <div class="indent-6">headers: {</div>
                        <div class="indent-12">Authorization: 'Bearer ' + api_token</div>
                        <div class="indent-6">},</div>
                        <div class="indent-6">dataType: 'json',</div>
                        <div class="indent-6">success: function (result, status, xhr) {</div>
                        <div class="indent-12">console.log(result);</div>
                        <div class="indent-6">},</div>
                        <div class="indent-6">error: function (xhr, status, error) {</div>
                        <div class="indent-12">console.log(error);</div>
                        <div class="indent-6">}</div>
                        <div>});</div>
                    </span>
                </CodeBlock>
                <div></div>
            </template>
        </ActionSection>
    </div>
    <!--    </AppLayout>-->
</template>
