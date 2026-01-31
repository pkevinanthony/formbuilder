<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
      <div class="mb-8">
        <a href="/dashboard" class="text-blue-600 hover:underline mb-4 inline-block">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-gray-900">Custom Domain</h1>
        <p class="text-gray-600">Connect your own domain to serve forms</p>
      </div>

      <!-- Feature Gate -->
      <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl p-8 mb-8">
        <h3 class="text-xl font-bold mb-2">🔒 Unlock Custom Domains</h3>
        <p class="text-white/80 mb-4">Upgrade to Professional to connect your own domain (e.g., forms.yourcompany.com).</p>
        <a href="/billing" class="inline-block px-4 py-2 bg-white text-blue-600 rounded-lg font-medium hover:bg-blue-50">
          Upgrade Now
        </a>
      </div>

      <!-- Current Domain -->
      <div class="bg-white rounded-xl shadow-sm border p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">Current Configuration</h2>
        <div class="p-4 bg-gray-50 rounded-lg">
          <p class="text-sm text-gray-500">Default Subdomain</p>
          <p class="font-medium text-gray-900">your-tenant.app.formbuilder.local</p>
          <span class="inline-block mt-2 px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
        </div>
      </div>

      <!-- SSL Info -->
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <h2 class="text-lg font-semibold mb-4">SSL Certificate</h2>
        <div class="flex items-start">
          <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
          </div>
          <div class="ml-4">
            <p class="font-medium">Automatic SSL</p>
            <p class="text-sm text-gray-500">SSL certificates are automatically provisioned for all domains.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
useHead({ title: 'Custom Domain - FormBuilder' })
</script>
