<template>
  <span>{{ fieldValue }}</span>
</template>

<script>
export default {
  props: ['resourceName', 'field'],

  computed: {
    fieldValue() {
      return this.field.displayedAs || this.field.value
    },
  },
    mounted() {
        this.field.value = this.field.value.replace(/(\d{3})(\d{3})(\d{3})/, '$1 $2 $3 ');
    },
}
</script>
