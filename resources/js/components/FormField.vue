<template>

        <DefaultField
            :field="field"
            :errors="errors"
            :show-help-text="showHelpText"
            :full-width-content="fullWidthContent"
        >

            <template #field class="bg-green-300 dark:bg-red-400" >
                <vue-tel-input :theme="theme" id="tel" v-model="phone" mode="national" v-bind="bindProps"></vue-tel-input>
            </template>

        </DefaultField>

</template>

<style scoped>

</style>


<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import { VueTelInput } from 'vue-tel-input';
import 'vue-tel-input/dist/vue-tel-input.css';

import moment from 'moment'

export default {
    components: {
        VueTelInput
    },

  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

    data(){
        return {
            phone: null,
            bindProps: {
                mode: "national",
                defaultCountry: "SK",
                disabledFetchingCountry: false,
                disabled: false,
                disabledFormatting: false,
                placeholder: "nieco number",
                required: false,
                enabledCountryCode: false,
                enabledFlags: true,
                preferredCountries: ['SK','CZ'],
                onlyCountries: [],
                ignoredCountries: [],
                wrapperClasses: "",
                inputClasses: "",
            }
        }
    },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || ''
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || '')
    },
        darkDetector(mutationList, observer) {
            let self = this
            mutationList.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (mutation.target.classList.contains('dark')) {
                        document.querySelector('.vue-tel-input input').classList.add('form-input')
                        document.querySelector('.vue-tel-input').classList.add('form-input-bordered')
                    }
                    else {
                        document.querySelector('.vue-tel-input input').classList.remove('form-input')
                    }
                }
            })
        },
        initDarkDetector(){
            const btn = document.querySelector('html')
            const options = {
                attributes: true
            }
            const observer = new MutationObserver(this.darkDetector)
            observer.observe(btn, options)

            if (localStorage.novaTheme === 'dark' || (!('novaTheme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
               document.querySelector('.vue-tel-input input').classList.add('form-input')
            } else {
                document.querySelector('.vue-tel-input input').classList.remove('form-input')
            }
        },
    },
    mounted() {
        this.initDarkDetector()
        console.log(moment().format('YYYY-MM-DD' ));
        document.querySelector('.vue-tel-input input').classList.add('form-control')
        document.querySelector('.vue-tel-input').classList.add('form-input-bordered')
        //document.querySelector('.vue-tel-input input').placeholder = 'Tel. číslo'
    },
}
</script>


