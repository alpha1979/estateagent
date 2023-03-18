<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
          <Link :href="route('listing.index')">Buy House with us</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4">
          <div class="text-sm text-gray-500">{{ user.name }}</div>
          <Link :href="route('listing.create')">Create Listing</Link>
          <div>
            <Link :href="route('logout')" method="delete" as="button">Logout</Link>
          </div>
        </div>
        <div v-else class="flex items-center gap-4">
          <Link :href="route('user-account.create')">Register</Link>
          <Link :href="route('login')">Login</Link>
        </div>
      </nav>
    </div>
  </header>
  <!-- <div>The page with the timer {{ timer }}</div> -->
  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="success">
      {{ flashSuccess }}
    </div>
    <slot />
  </main>
</template>

<script setup>
import { computed } from 'vue'
import {Link, usePage } from '@inertiajs/inertia-vue3'

const page = usePage()
const flashSuccess = computed(
  () => {
    return page.props.value.flash.success
  },
)

const user = computed(() => {
  return page.props.value.user
})
</script>

<style scoped>
  .success {
    background-color: green;
    color: white;
  }
</style>