<template>
  <form @submit.prevent="create">
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
        <button type="submit">Create</button>
      </div>
    </div>
  </form>
</template>
<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  beds:0,
  baths:0,
  area:0,
  city:null,
  code:0,
  street:null,
  postcode:0,
  price:0,
})
// eslint-disable-next-line no-undef
const create = () => form.post(route('listing.store'))
</script>

<style scoped>
label {
    margin: 2em;
}

div {
    padding: 2px;
}
</style>