<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Preferencias de Usuario
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 lg:p-8">
            <form @submit.prevent="updatePreferences" class="space-y-6">
              <!-- Theme Selection -->
              <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                  Tema
                </h3>
                <div class="mt-4 space-y-4">
                  <div class="flex items-center space-x-4">
                    <button
                      type="button"
                      @click="form.theme = 'light'"
                      :class="[
                        'px-4 py-2 rounded-md',
                        form.theme === 'light'
                          ? 'bg-primary-500 text-white'
                          : 'bg-white text-gray-700 border border-gray-300'
                      ]"
                    >
                      Claro
                    </button>
                    <button
                      type="button"
                      @click="form.theme = 'dark'"
                      :class="[
                        'px-4 py-2 rounded-md',
                        form.theme === 'dark'
                          ? 'bg-primary-500 text-white'
                          : 'bg-gray-800 text-white border border-gray-700'
                      ]"
                    >
                      Oscuro
                    </button>
                  </div>
                </div>
              </div>

              <!-- Language Selection -->
              <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                  Idioma
                </h3>
                <div class="mt-4 space-y-4">
                  <div class="flex items-center space-x-4">
                    <button
                      type="button"
                      @click="form.language = 'es'"
                      :class="[
                        'px-4 py-2 rounded-md',
                        form.language === 'es'
                          ? 'bg-primary-500 text-white'
                          : 'bg-white text-gray-700 border border-gray-300'
                      ]"
                    >
                      Español
                    </button>
                    <button
                      type="button"
                      @click="form.language = 'en'"
                      :class="[
                        'px-4 py-2 rounded-md',
                        form.language === 'en'
                          ? 'bg-primary-500 text-white'
                          : 'bg-white text-gray-700 border border-gray-300'
                      ]"
                    >
                      English
                    </button>
                  </div>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="flex items-center justify-end mt-4">
                <loading-button
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Guardar Cambios
                </loading-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import LoadingButton from '@/Components/LoadingButton.vue'

const props = defineProps({
  preferences: {
    type: Object,
    required: true
  },
  availableThemes: {
    type: Array,
    required: true
  },
  availableLanguages: {
    type: Array,
    required: true
  }
})

const form = useForm({
  theme: props.preferences.theme,
  language: props.preferences.language
})

const updatePreferences = () => {
  form.put(route('user-preferences.update'))
}
</script> 