statusFunction= function (data) {
    switch (data) {
        case 0:
            return "پرداخت نشده";
        case 1:
            return "پرداخت شده";
        case 2:
            return 'دریافت شده';
        case 3:
            return 'کنسل شده';
        case 4:
            return 'کنسل شده از طرف مشتری';
        case 6:
            return 'کنسل شده از طرف بهینه';
        case 7 :
            return "پرداخت شده";
        default:
            return "__";
    }
};
