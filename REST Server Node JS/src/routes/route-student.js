const router = require('express').Router();
const { student } = require('../controllers');

router.get('/students', student.getDataStudent);
router.get('/students/:nim', student.getDataStudentByNIM);
router.post('/students', student.addDataStudent);
router.put('/students/:nim', student.editDataStudent);
router.delete('/students/:nim', student.deleteDataStudent);

module.exports = router;