<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-7xl mx-auto">
      <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
        <p class="text-gray-600">Manage all tenants in the system</p>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Total Tenants</p>
          <p class="text-3xl font-bold text-gray-900">0</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Active</p>
          <p class="text-3xl font-bold text-green-600">0</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Trial</p>
          <p class="text-3xl font-bold text-blue-600">0</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6">
          <p class="text-sm text-gray-500">Total Users</p>
          <p class="text-3xl font-bold text-gray-900">0</p>
        </div>
      </div>

      <!-- Tenants Table -->
      <div class="bg-white rounded-xl shadow-sm border">
        <div class="px-6 py-4 border-b flex items-center justify-between">
          <h2 class="text-lg font-semibold">Tenants</h2>
          <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Tenant
          </button>
        </div>
        <div class="p-12 text-center text-gray-500">
          <p>No tenants yet. Create one to get started.</p>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="mt-8">
        <a href="/dashboard" class="text-blue-600 hover:underline">← Back to Dashboard</a>
      </div>
    </div>
  </div>
</template>

<script setup>
useHead({ title: 'Admin - FormBuilder' })
</script>
