<template>

    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >


        <template #field class="bg-green-300 dark:bg-red-400" >
            <vue-tel-input
                @validate="validationMethod"
                v-model="value"
                :id="field.attribute"
                v-bind="bindProps">
            </vue-tel-input>
        </template>

    </DefaultField>


</template>

<style scoped>

</style>


<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import { VueTelInput } from 'vue-tel-input';
import 'vue-tel-input/dist/vue-tel-input.css';


export default {
    components: {
        VueTelInput
    },

    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data(){
        return {
            validate:'',
            enableValidate: this.field.enableValidate ?? true,
            phone: '464686',
            bindProps: {
                mode: this.field.mode || 'international',
                defaultCountry: "SK",
                disabledFetchingCountry: false,
                disabled: false,
                autoDefaultCountry: true,
                disabledFormatting: false,
                placeholder: "Tel. číslo",
                required: false,
                enabledCountryCode: this.field.enabledCountryCode ?? 'true',
                enabledFlags: true,
                preferredCountries: this.field.preferredCountries,
                onlyCountries: this.field.onlyCountries,
                ignoredCountries: [],
                wrapperClasses: "",
                inputClasses: "",
                validCharactersOnly: "true",
                dropdownOptions: {
                    showDialCodeInList: true,
                    showSearchBox: true,
                    disabledDialCode: false,
                    showFlags: true,
                },
                inputOptions: {
                    showDialCode: this.field.showDialCode  ?? 'true',
                    placeholder: this.field.placeholder || 'Phone number',
                }
            }
        }
    },

    methods: {
        validationMethod: function ({ number, valid, country}) {
            if (this.enableValidate === false) return
            this.checkMethod(valid)
        },
        checkMethod(valid){
            let input =  document.querySelector('.vue-tel-input input')
            if(valid == false){
                input.style.color="red"
            }
            if(valid == true){
                input.style.color="initial"
            }
        },
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
            formData.append(this.field.attribute, (this.value).replaceAll(' ', '') || '')
        },
    },
    mounted() {
        document.querySelector('.vue-tel-input input').classList.add('form-control')
        document.querySelector('.vue-tel-input input').classList.add('form-input')
        document.querySelector('.vue-tel-input').classList.add('form-input-bordered')
    },
}
</script>


