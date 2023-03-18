<template>
  <div>
    Show Page
  </div>
  {{ message }}
</template>

<script setup>
    
defineProps({
  message: String,
})
</script>
