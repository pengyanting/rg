
export const save = function(key, value) {
  return localStorage.setItem(key, value)
}

export const read = function(key) {
  return localStorage.getItem(key)
}

