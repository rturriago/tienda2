// Sólo letras y espacios
jQuery.validator.addMethod("letras", function(value, element) {
    return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáé íñó]*$/.test(value);
}, "Solo letras mayúsculas");

// Sólo números
jQuery.validator.addMethod("numbersonly", function(value, element) {
    //return this.optional(element) || /^[a-z]+$/i.test(value);
    return this.optional(element) || /[0-9]/.test(value);
}, );

// Número natural
jQuery.validator.addMethod('positivo', function(value, element, param) {
    return value >= 0;
}, "El valor ingresado no puede ser negativo");

jQuery.validator.addMethod("cedula", function(value, element) {

    var cedula = value.substring(0, 10);
    array = cedula.split("");
    num = array.length;
    if (num == 10) {
        total = 0;
        digito = (array[9] * 1);
        for (i = 0; i < (num - 1); i++) {
            mult = 0;
            if ((i % 2) != 0) {
                total = total + (array[i] * 1);
            } else {
                mult = array[i] * 2;
                if (mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if ((final == 10 && digito == 0) || (final == digito)) {
            if (cedula == "1111111111" || cedula == "2222222222" || cedula == "4444444444" || cedula == "5555555555" || cedula == "7777777777" || cedula == "9999999999" || cedula == "9999999999") {
                return false;
            } else {
                return true;
            }

        } else {
            return false;
        }
    } else {
        return false;
    }

}, "Debe escribir un número de cédula de 10 cifras sin espacios, donde omita el guión al medio (-)");

// *** Tredes ****************************************************

// uno o dos nombres solo en mayúsculas
jQuery.validator.addMethod("names_upper", function(value, element) {
    //return this.optional(element) || /^[A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,16}[ ]?[A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,16}$/.test(value);
    return this.optional(element) || /^[A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,16}[ ]?([A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,5})?[ ]?[A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,16}$/.test(value);
}, "Debe escribir 1, 2 o 3 nombres separados por espacios. Ej. MARÍA, MARÍA ELENA o MARÍA DEL CARMEN");

// uno o dos apellidos solo en mayúsculas
jQuery.validator.addMethod("last_names_upper", function(value, element) {
    return this.optional(element) || /^[A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,16}[ ][A-ZÁÉÍÓÚÜÑa-záéíóúüñ]{2,16}$/.test(value);
}, "Debe escribir 2 apellidos separados por un espacio. Ej. PILAGUANO GARCÍA");

// celular
jQuery.validator.addMethod("celular", function(value, element) {
    return this.optional(element) || /^[0-9]{10,10}$/.test(value);
}, "Debe escribir un número de teléfono celular de 10 cifras sin espacios. Ej. 0983390039");