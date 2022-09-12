<script>
import {InertiaLink} from "@inertiajs/inertia-vue3";

export default {
  props: {
    links: Array,
  },
  components : {
    InertiaLink
  }
}
</script>

<template>
  <div v-if="links.length > 1">
    <div class="flex flex-wrap mb-1">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" v-bind:key="key" class="mr-1 mt-2 px-4 py-3 text-sm leading-4 text-gray-600 border rounded" v-html="link.label" />
        <inertia-link v-else v-bind:key="link" class="mr-1 mt-2 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
      </template>
    </div>
  </div>
</template>
