<template>
  <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
      <div class="mb-8">
        <a href="/dashboard" class="text-blue-600 hover:underline mb-4 inline-block">← Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-gray-900">Create New Form</h1>
        <p class="text-gray-600">Build your form step by step</p>
      </div>

      <div class="bg-white rounded-xl shadow-sm border p-6">
        <form @submit.prevent="createForm" class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Form Title</label>
            <input
              v-model="form.title"
              type="text"
              required
              placeholder="e.g., Contact Form, Survey, Registration"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description (optional)</label>
            <textarea
              v-model="form.description"
              rows="3"
              placeholder="What is this form for?"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            ></textarea>
          </div>

          <div class="pt-4 border-t">
            <h3 class="font-medium text-gray-900 mb-4">Form Fields</h3>
            <p class="text-gray-500 text-sm mb-4">Add fields to your form by clicking the buttons below.</p>

            <div class="flex flex-wrap gap-2 mb-6">
              <button type="button" @click="addField('text')" class="px-3 py-2 border rounded-lg hover:bg-gray-50">
                + Text Field
              </button>
              <button type="button" @click="addField('email')" class="px-3 py-2 border rounded-lg hover:bg-gray-50">
                + Email
              </button>
              <button type="button" @click="addField('textarea')" class="px-3 py-2 border rounded-lg hover:bg-gray-50">
                + Long Text
              </button>
              <button type="button" @click="addField('select')" class="px-3 py-2 border rounded-lg hover:bg-gray-50">
                + Dropdown
              </button>
              <button type="button" @click="addField('checkbox')" class="px-3 py-2 border rounded-lg hover:bg-gray-50">
                + Checkbox
              </button>
            </div>

            <div v-if="form.fields.length === 0" class="text-center py-8 border-2 border-dashed rounded-lg">
              <p class="text-gray-500">No fields added yet. Click the buttons above to add fields.</p>
            </div>

            <div v-else class="space-y-3">
              <div v-for="(field, index) in form.fields" :key="index" class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-400">{{ index + 1 }}.</span>
                <input
                  v-model="field.label"
                  type="text"
                  :placeholder="field.type + ' field label'"
                  class="flex-1 border rounded px-3 py-2"
                />
                <span class="text-xs text-gray-500 uppercase">{{ field.type }}</span>
                <button type="button" @click="removeField(index)" class="text-red-500 hover:text-red-700">
                  ✕
                </button>
              </div>
            </div>
          </div>

          <div class="flex justify-end gap-3 pt-4">
            <a href="/dashboard" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
              Create Form
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'

useHead({ title: 'Create Form - FormBuilder' })

const form = reactive({
  title: '',
  description: '',
  fields: []
})

const addField = (type) => {
  form.fields.push({ type, label: '', required: false })
}

const removeField = (index) => {
  form.fields.splice(index, 1)
}

const createForm = () => {
  alert('Form created! (This would save to the API)')
  console.log('Form data:', form)
}
</script>
