<template>
  <span>{{fieldValue }}</span>
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
        console.log( this.field.value);
       //  console.log(this.fieldValue);
         this.field.value = this.field.value.replace('00', '+');
    },
}
</script>
