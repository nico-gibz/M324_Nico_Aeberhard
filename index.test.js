// Datei: index.test.js
import assert from 'assert'
import { sum } from './index.js'

describe('sum', () => {
  it('should add 1 + 2 to equal 3', () => {
    assert.equal(sum(1, 2), 3)
  })

  it('should add 1.5 + 2.3 to equal 3.8', () => {
    assert.equal(sum(1.5, 2.3), 3.8)
  })
})
