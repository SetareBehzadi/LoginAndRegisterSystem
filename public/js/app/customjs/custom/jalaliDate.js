miladiToShamsi = function (date) {
    moment.locale('en');
    var shmasi = moment(date, 'YYYY-MM-DD HH:mm:ss')
    //  .format('jYYYY/jMM/jDD HH:mm:ss'); // 1392/6/31 23:59:59
        .format('jYYYY/jMM/jDD HH:mm'); // 1392/6/31 23:59:59
    return shmasi;

};

miladiToShamsiNoHour = function (date) {
    moment.locale('en');
    var shmasi = moment(date, 'YYYY-MM-DD HH:mm:ss')
    //  .format('jYYYY/jMM/jDD HH:mm:ss'); // 1392/6/31 23:59:59
        .format('jYYYY/jMM/jDD'); // 1392/6/31 23:59:59
    return shmasi;

};



jalaliToMiladi = function (date) {

    var miladi = moment(date, 'YYYY/MM/DD')
        .locale('en')
        .format('YYYY-MM-DD HH:mm:ss'); // 1392/6/31 23:59:59
    return miladi;
};

miladiToShamsiYear = function (date) {
    moment.locale('en');
    var shmasi = moment(date, 'YYYY-MM-DD HH:mm:ss')
    //  .format('jYYYY/jMM/jDD HH:mm:ss'); // 1392/6/31 23:59:59
        .format('jYYYY/jMM'); // 1392/6
    return shmasi;

};

miladiToShamsiMonth = function (date) {
    moment.locale('en');
    var shmasi = moment(date, 'YYYY-MM-DD HH:mm:ss')
    //  .format('jYYYY/jMM/jDD HH:mm:ss'); // 1392/6/31 23:59:59
        .format('jM'); // 1392/6/31 23:59:59
    return shmasi;

};

monthInPersian = function (month) {

    var months = [
        'something wrong',
        'فروردین',
        'اردیبهشت',
        'خرداد',
        'تیر',
        'مرداد',
        'شهریور',
        'مهر',
        'آبان',
        'آذر',
        'دی',
        'بهمن',
        'اسفند'
    ];

    return months[month];

};

