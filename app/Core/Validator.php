<?php
namespace App\Core;

class Validator {
    
    public static function required($value) {
        return !empty(trim($value));
    }
    
    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public static function minLength($value, $min) {
        return strlen($value) >= $min;
    }
    
    public static function maxLength($value, $max) {
        return strlen($value) <= $max;
    }
    
    public static function numeric($value) {
        return is_numeric($value);
    }
    
    public static function date($value) {
        $date = \DateTime::createFromFormat('Y-m-d', $value);
        return $date && $date->format('Y-m-d') === $value;
    }
    
    public static function phone($value) {
        return preg_match('/^[\+]?[0-9\s\-\(\)]+$/', $value);
    }
    
    public static function lettersOnly($value) {
        return preg_match('/^[a-zA-ZÀ-ÿ\s\-\']+$/u', $value);
    }
    
    public static function alphanumeric($value) {
        return preg_match('/^[a-zA-Z0-9\s]+$/', $value);
    }
    
    public static function fileType($file, $allowedTypes) {
        return in_array($file['type'], $allowedTypes);
    }
    
    public static function fileSize($file, $maxSize) {
        return $file['size'] <= $maxSize;
    }
    
    public static function validate($data, $rules) {
        $errors = [];
        
        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? '';
            
            foreach ($fieldRules as $rule => $parameter) {
                if ($rule === 'required' && !self::required($value)) {
                    $errors[$field][] = "Le champ {$field} est obligatoire.";
                    continue;
                }
                
                if (!empty($value)) {
                    switch ($rule) {
                        case 'email':
                            if (!self::email($value)) {
                                $errors[$field][] = "Le format de l'email est invalide.";
                            }
                            break;
                            
                        case 'min':
                            if (!self::minLength($value, $parameter)) {
                                $errors[$field][] = "Le champ {$field} doit contenir au moins {$parameter} caractères.";
                            }
                            break;
                            
                        case 'max':
                            if (!self::maxLength($value, $parameter)) {
                                $errors[$field][] = "Le champ {$field} ne doit pas dépasser {$parameter} caractères.";
                            }
                            break;
                            
                        case 'numeric':
                            if (!self::numeric($value)) {
                                $errors[$field][] = "Le champ {$field} doit être numérique.";
                            }
                            break;
                            
                        case 'date':
                            if (!self::date($value)) {
                                $errors[$field][] = "Le format de date est invalide.";
                            }
                            break;
                            
                        case 'phone':
                            if (!self::phone($value)) {
                                $errors[$field][] = "Le format du téléphone est invalide.";
                            }
                            break;
                            
                        case 'letters':
                            if (!self::lettersOnly($value)) {
                                $errors[$field][] = "Le champ {$field} ne doit contenir que des lettres.";
                            }
                            break;
                    }
                }
            }
        }
        
        return $errors;
    }
}
?>