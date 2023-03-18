<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" />
        <Address :listing="props.listing" />
      </Box>
      <Box>
        <template #header>
          Monthly payment
        </template>
        <div>
          <label for="">Interest rate ({{ interestRate }})</label>
          <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appearnace-none cursor-pointer" />
          <label for="">Duration ({{ duration }})</label>
          <input v-model.number="duration" type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg appearnace-none cursor-pointer" />
        </div>
        <div class="text-gray-600 mt-2">
          <div class="text-gray-400">
            Monthly payment
          </div>
          <Price :price="monthlyPayment" class="text-3xl" />
        </div>
        <div class="text-gray-500 mt-2">
          <div class="flex justify-between">
            <div>Total to pay </div>
            <div><Price :price="totalPaid" class="text-3xl" :class="font-medium" /></div>
          </div> 
          <div class="flex justify-between">
            <div>Total Interest to pay </div>
            <div><Price :price="totalInterest" class="text-3xl" :class="font-medium" /></div>
          </div>     
        </div>
      </Box>
    </div>
  </div>
</template>


<script setup>
import Address from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Box from '@/Components/UI/Box.vue'
import { ref } from 'vue'
import Price from '@/Components/Price.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'

const interestRate = ref(2.5)
const duration = ref(25)
const props = defineProps(
  {
    listing: Object,
  },
)

const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(props.listing.price, interestRate, duration)

</script>