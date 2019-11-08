import {
  shallowMount
} from '@vue/test-utils'

import moxios from 'moxios'
import PokemonTable from '../../../resources/assets/js/components/home/PokemonTable.vue'

describe('PokemonTable', () => {
  beforeEach(function () {
    moxios.install(axios)
  })

  afterEach(function () {
    moxios.uninstall(axios)
  })

  it('is a Vue instance', () => {
    const wrapper = shallowMount(PokemonTable)
    expect(wrapper.isVueInstance()).toBeTruthy()
  })

  it('Successfully mount the component', (done) => {
    const wrapper = shallowMount(PokemonTable)

    moxios.stubRequest(`/api/v1/pokemons?page=1`, {
      status: 200,
      response: {
        pokemons: {
          last_page: 2,
          data: [{
            name: "Groundon",
            sprites: {
              front_default: "spri.jpg"
            },
            weight: 9999,
            height: 50,
            base_experience: 100
          }]
        }
      }
    })

    moxios.wait(() => {
      expect(wrapper.vm.pokemons.data).toEqual([{
        name: "Groundon",
        sprites: {
          front_default: "spri.jpg"
        },
        weight: 9999,
        height: 50,
        base_experience: 100
      }])

      expect(wrapper.text()).toContain('Groundon')
      expect(wrapper.text()).toContain('9999')
      expect(wrapper.text()).toContain('50')
      expect(wrapper.text()).toContain('100')

      done()
    })
  })
})