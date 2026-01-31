<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
      <div class="mb-8">
        <a href="/dashboard" class="text-blue-600 hover:underline mb-4 inline-block">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-gray-900">Billing & Subscription</h1>
        <p class="text-gray-600">Manage your plan and payment method</p>
      </div>

      <!-- Current Plan -->
      <div class="bg-white rounded-xl shadow-sm border p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">Current Plan</h2>
        <div class="flex items-center justify-between">
          <div>
            <p class="text-3xl font-bold text-gray-900">Free</p>
            <p class="text-gray-500">3 forms, 100 submissions/month</p>
          </div>
          <button @click="showPlans = true" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Upgrade Plan
          </button>
        </div>
      </div>

      <!-- Pricing Plans -->
      <div v-if="showPlans" class="mb-8">
        <h2 class="text-lg font-semibold mb-4">Available Plans</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
          <div v-for="(plan, key) in plans" :key="key"
               :class="['bg-white rounded-xl border p-6', plan.popular ? 'border-blue-500 ring-2 ring-blue-500' : '']">
            <div v-if="plan.popular" class="text-xs font-bold text-blue-600 mb-2">MOST POPULAR</div>
            <h3 class="font-bold text-lg">{{ plan.name }}</h3>
            <p class="text-3xl font-bold my-4">${{ plan.price_monthly }}<span class="text-sm text-gray-500">/mo</span></p>
            <ul class="text-sm text-gray-600 space-y-2 mb-4">
              <li>{{ plan.features.forms === -1 ? 'Unlimited' : plan.features.forms }} forms</li>
              <li>{{ plan.features.submissions_per_month === -1 ? 'Unlimited' : plan.features.submissions_per_month.toLocaleString() }} submissions</li>
              <li>{{ plan.features.team_members === -1 ? 'Unlimited' : plan.features.team_members }} team members</li>
              <li v-if="plan.features.custom_domain">✓ Custom domain</li>
              <li v-if="plan.features.white_label">✓ White-label</li>
            </ul>
            <button class="w-full py-2 border rounded-lg hover:bg-gray-50">
              {{ key === 'free' ? 'Current Plan' : 'Select Plan' }}
            </button>
          </div>
        </div>
      </div>

      <!-- Payment Method -->
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <h2 class="text-lg font-semibold mb-4">Payment Method</h2>
        <p class="text-gray-500">No payment method on file. Add one when you upgrade to a paid plan.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

useHead({ title: 'Billing - FormBuilder' })

const showPlans = ref(true)

const plans = {
  free: { name: 'Free', price_monthly: 0, features: { forms: 3, submissions_per_month: 100, team_members: 1, custom_domain: false, white_label: false } },
  starter: { name: 'Starter', price_monthly: 19, features: { forms: 10, submissions_per_month: 1000, team_members: 3, custom_domain: false, white_label: false } },
  professional: { name: 'Professional', price_monthly: 49, popular: true, features: { forms: 50, submissions_per_month: 10000, team_members: 10, custom_domain: true, white_label: true } },
  enterprise: { name: 'Enterprise', price_monthly: 149, features: { forms: -1, submissions_per_month: -1, team_members: -1, custom_domain: true, white_label: true } },
}
</script>
