<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
      <div class="mb-8">
        <a href="/dashboard" class="text-blue-600 hover:underline mb-4 inline-block">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-gray-900">White-Label Branding</h1>
        <p class="text-gray-600">Customize the look and feel of your forms</p>
      </div>

      <!-- Feature Gate -->
      <div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-xl p-8 mb-8">
        <h3 class="text-xl font-bold mb-2">🔒 Unlock White-Label Branding</h3>
        <p class="text-white/80 mb-4">Upgrade to Professional to customize branding and remove "Powered by" badges.</p>
        <a href="/billing" class="inline-block px-4 py-2 bg-white text-purple-600 rounded-lg font-medium hover:bg-purple-50">
          Upgrade Now
        </a>
      </div>

      <!-- Branding Form (Preview) -->
      <div class="bg-white rounded-xl shadow-sm border p-6 opacity-60">
        <h2 class="text-lg font-semibold mb-4">Brand Settings</h2>

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Logo URL</label>
            <input type="text" disabled placeholder="https://example.com/logo.png" class="w-full border rounded-lg px-4 py-2 bg-gray-50" />
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
              <div class="flex items-center gap-2">
                <input type="color" disabled value="#3B82F6" class="w-12 h-10 rounded" />
                <input type="text" disabled value="#3B82F6" class="flex-1 border rounded-lg px-4 py-2 bg-gray-50" />
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
              <div class="flex items-center gap-2">
                <input type="color" disabled value="#10B981" class="w-12 h-10 rounded" />
                <input type="text" disabled value="#10B981" class="flex-1 border rounded-lg px-4 py-2 bg-gray-50" />
              </div>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Font Family</label>
            <select disabled class="w-full border rounded-lg px-4 py-2 bg-gray-50">
              <option>Inter</option>
            </select>
          </div>

          <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
            <div>
              <p class="font-medium">Hide "Powered by" Badge</p>
              <p class="text-sm text-gray-500">Remove branding from your forms</p>
            </div>
            <div class="w-11 h-6 bg-gray-300 rounded-full"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
useHead({ title: 'Branding - FormBuilder' })
</script>
