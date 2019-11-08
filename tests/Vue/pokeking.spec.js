import {
  mount
} from '@vue/test-utils'

import moxios from 'moxios'
import PokeKing from '../../resources/assets/js/components/home/PokeKing.vue'

describe('PokeKing', () => {
  beforeEach(function () {
    moxios.install()
  })

  afterEach(function () {
    moxios.uninstall()
  })

  it('is a Vue instance', () => {
    const wrapper = mount(PokeKing)
    expect(wrapper.isVueInstance()).toBeTruthy()
  })

  it('Successfully declares the pokeking', (done) => {
    const wrapper = mount(PokeKing)

    moxios.stubRequest('/api/v1/pokeking', {
      status: 200,
      response: {
        data: [{
          pokeking: {
            name: "Groundon"
          }
        }]
      }
    })

    wrapper.vm.declare()

    moxios.wait(() => {
      expect(wrapper.vm.pokeking).toEqual([{
        name: "Groundon"
      }])
      done()
    })
  })
})