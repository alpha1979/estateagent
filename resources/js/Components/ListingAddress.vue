<template>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header>
          Basic Info
        </template>
        {{ listing.beds }} beds house in  {{ listing.city }}
      </Box>
    </div>
</template>


<script setup>
import Box from '@/Components/UI/Box.vue'
defineProps(
  {
    listing: Object,
  },
)
</script>