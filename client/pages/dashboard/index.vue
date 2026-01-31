<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-7xl mx-auto">
      <!-- Header -->
      <div class="flex items-center justify-between mb-8">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
          <p class="text-gray-600">Welcome to your form builder dashboard</p>
        </div>
        <a href="/forms/create" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
          + Create Form
        </a>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Total Forms</p>
          <p class="text-3xl font-bold text-gray-900">0</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Submissions</p>
          <p class="text-3xl font-bold text-gray-900">0</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Views</p>
          <p class="text-3xl font-bold text-gray-900">0</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Conversion Rate</p>
          <p class="text-3xl font-bold text-gray-900">0%</p>
        </div>
      </div>

      <!-- Recent Forms -->
      <div class="bg-white rounded-xl shadow-sm border">
        <div class="px-6 py-4 border-b">
          <h2 class="text-lg font-semibold">Recent Forms</h2>
        </div>
        <div class="p-12 text-center text-gray-500">
          <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <p class="mb-4">No forms yet. Create your first form to get started.</p>
          <a href="/forms/create" class="text-blue-600 hover:underline">Create a form →</a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/billing" class="bg-white rounded-xl shadow-sm border p-6 hover:border-blue-300 transition-colors">
          <h3 class="font-semibold text-gray-900 mb-2">Billing & Plans</h3>
          <p class="text-sm text-gray-500">Manage your subscription and payment methods</p>
        </a>
        <a href="/settings/branding" class="bg-white rounded-xl shadow-sm border p-6 hover:border-blue-300 transition-colors">
          <h3 class="font-semibold text-gray-900 mb-2">Branding</h3>
          <p class="text-sm text-gray-500">Customize your forms with your brand</p>
        </a>
        <a href="/settings/domain" class="bg-white rounded-xl shadow-sm border p-6 hover:border-blue-300 transition-colors">
          <h3 class="font-semibold text-gray-900 mb-2">Custom Domain</h3>
          <p class="text-sm text-gray-500">Connect your own domain</p>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
useHead({ title: 'Dashboard - FormBuilder' })
</script>
