import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-tel-input', IndexField)
  app.component('detail-tel-input', DetailField)
  app.component('form-tel-input', FormField)
})
