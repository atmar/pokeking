import {
  shallowMount
} from '@vue/test-utils'

import Paginate from '../../../resources/assets/js/components/pagination/Paginate.vue'

describe('Paginate', () => {
  it('is a Vue instance', () => {
    const wrapper = shallowMount(Paginate)
    expect(wrapper.isVueInstance()).toBeTruthy()
  })
})
