/**
 * Implements theme_form_element().
 * Printing label attribute after input for text fields
 */
function adminimal_form_element($variables) {

  $element = $variables['element'];
  $value = $variables['element']['#children'];

  if ($element['#theme'] == 'textfield') {

    $wrapper_classes = array(
      'form-item',
    );
    $output = '<div class="' . implode(' ', $wrapper_classes) . '" id="' . $element['#id'] . '-wrapper">' . "\n";
    $required = !empty($element['#required']) ? '<span class="form-required" title="' . t('This field is required.') . '">*</span>' : '';

    $output .= $value . "\n";

    if (!empty($element['#title'])) {
      $title = $element['#title'];
      $output .= ' <label for="' . $element['#id'] . '"><span class="labelwrap">' . t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) . "</span></label>\n";
    }

    if (!empty($element['#description'])) {
      $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
    }

    $output .= "</div>\n";
    
  }else {
    $wrapper_classes = array(
      'form-item',
    );
    $output = '<div class="' . implode(' ', $wrapper_classes) . '" id="' . $element['#id'] . '-wrapper">' . "\n";
    $required = !empty($element['#required']) ? '<span class="form-required" title="' . t('This field is required.') . '">*</span>' : '';

    if (!empty($element['#title'])) {
      $title = $element['#title'];
      $output .= ' <label for="' . $element['#id'] . '"><span class="labelwrap">' . t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) . "</span></label>\n";
    }

    $output .= $value . "\n";    

    if (!empty($element['#description'])) {
      $output .= ' <div class="description">' . $element['#description'] . "</div>\n";
    }

    $output .= "</div>\n";
  }
  return $output;
}