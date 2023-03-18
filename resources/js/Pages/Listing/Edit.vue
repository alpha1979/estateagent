<template>
  <form @submit.prevent="update">
    <div>
      <div>
        <label for="">Beds</label>
        <input v-model.number="form.beds" type="text" />
        <div v-if="form.errors.beds"> {{ form.errors.beds }}</div>
      </div>
      <div>
        <label for="">Baths</label>
        <input v-model.number="form.baths" type="text" />
        <div v-if="form.errors.baths"> {{ form.errors.baths }}</div>
      </div>
      <div>
        <label for="">Area</label>
        <input v-model.number="form.area" type="text" />
        <div v-if="form.errors.area"> {{ form.errors.area }}</div>
      </div>
      <div>
        <label for="">city</label>
        <input v-model="form.city" type="text" />
        <div v-if="form.errors.city"> {{ form.errors.city }}</div>
      </div>
      <div>
        <label for="">code</label>
        <input v-model.number="form.code" type="text" />
        <div v-if="form.errors.code"> {{ form.errors.code }}</div>
      </div>
      <div>
        <label for="">street</label>
        <input v-model="form.street" type="text" />
        <div v-if="form.errors.street"> {{ form.errors.street }}</div>
      </div>
      <div>
        <label for="">Post code</label>
        <input v-model.number="form.postcode" type="text" />
        <div v-if="form.errors.code"> {{ form.errors.postcode }}</div>
      </div>
      <div>
        <label for="">Price</label>
        <input v-model.number="form.price" type="text" />
        <div v-if="form.errors.price"> {{ form.errors.price }}</div>
      </div>
      <div>
        <button type="submit">Edit</button>
      </div>
    </div>
  </form>
</template>
<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
const props = defineProps({
  listing: Object,
})
const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area:props.listing.area,
  city: props.listing.city,
  code: props.listing.code,
  street: props.listing.street,
  postcode: props.listing.postcode,
  price: props.listing.price,
})
const update = () => form.put(route('listing.update', {listing: props.listing.id}))
</script>
  
  <style scoped>
  label {
      margin: 2em;
  }
  
  div {
      padding: 2px;
  }
  </style>