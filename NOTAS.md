boolean promo = true
    regular = false
    condicional = false
    libre = false
    gism = true

int ausentes = 0
    pregDes = 0
    mensDes = 0
    
PARA LA REGULARIDAD

    if ($value < 7) {
        promo = false;
    } else
        if (PregDes <= 8 && Ausentes <= 8) {
            if (gism= true) {
                regular = true
            }
        }
        else
            if (mensDes <= 3) {
                if (PregDes <= 16 && ausentes <= 16) {
                    condicional = true
                } else libre = true
            } else libre = true