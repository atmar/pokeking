import {
  shallowMount
} from '@vue/test-utils'

import moxios from 'moxios'
import PokeKing from '../../../resources/assets/js/components/home/PokeKing.vue'

describe('PokeKing', () => {
  beforeEach(function () {
    moxios.install(axios)
  })

  afterEach(function () {
    moxios.uninstall(axios)
  })

  it('is a Vue instance', () => {
    const wrapper = shallowMount(PokeKing)
    expect(wrapper.isVueInstance()).toBeTruthy()
  })

  it('Successfully declares the pokeking', (done) => {
    const wrapper = shallowMount(PokeKing)

    moxios.stubRequest(`/api/v1/pokeking`, {
      status: 200,
      response: {
          pokeking: {
            name: "Groundon",
            sprites: {
              front_default: "spri.jpg"
            }
          }
      }
    })

    wrapper.vm.declare()

    moxios.wait(() => {
      expect(wrapper.vm.pokeking).toEqual({
        name: "Groundon",
        sprites: {
          front_default: "spri.jpg"
        }
      })

      expect(wrapper.text()).toContain('Groundon')

      done()
    })
  })
})