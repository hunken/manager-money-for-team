/**
 *
 * @param array
 * @param element
 */
function remove_element_from_array(array, element) {
    const index = array.indexOf(element);
    array.splice(index, 1);
}