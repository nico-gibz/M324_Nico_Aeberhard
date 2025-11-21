// index.js in feature1
var unusedVariable = 'some value'

export const sum = (a, b) => {
  return a - b
}
console.log(sum(1, 2))
console.log(unusedVariable)
