<template>
  <Box>
    <div> 
      <Link :href="route('listing.show', {listing: listing.id})"> 
        <div class="flex items-center gap-1">
          <Price :price="listing.price" class="text-2xl font-bold" />
          <div>
            <price :price="monthlyPayment" /> pm
          </div>
        </div>
        <ListingSpace :listing="listing" />
        <Address :listing="listing" /> 
      </Link>
    </div>
    <div>
      <Link :href="route('listing.edit', {listing: listing.id})">
        Edit
      </Link>
    </div>
    <div>
      <Link :href="route('listing.destroy', {listing: listing.id})" method="delete" as="button">
        Delete
      </Link>
    </div>
  </Box>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Address from '@/Components/ListingAddress.vue'
import Box from '@/Components/UI/Box.vue'
import Price from '@/Components/Price.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

const props = defineProps({
  listing: Object,
})

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>