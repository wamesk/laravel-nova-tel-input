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
        this.field.value = this.field.value.slice(2).replace(/(\d{3})(\d{3})(\d{3})/, '+$1 $2 $3 ');
         //this.field.value = this.field.value.replace('00', '+');
    },
}
</script>
