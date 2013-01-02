<?php
/* @var $this AbsenController */
/* @var $model Absen */

$this->breadcrumbs = array(
    'Absen' => array('admin', 'pid' => $model->pegawai->id),
    $model->pegawai->nama => array('pegawai/view/id/' . $model->pegawai->id),
    'Hapus',
);

$this->menu = array(
    array('label' => 'Kelola Absen', 'url' => array('admin', 'pid' => $model->pegawai->id)),
);
?>

<h1>Buat Absen</h1>

<?php
$cal_id = 'mycall';
$this->widget('ext.calendar.EFullCalendar', array(
    'id' => $cal_id,
    'multipleEvent' => false,
    'data' => CHtml::normalizeUrl(array('/pegawai/absen/calendar')) . '?id=' . $model->pegawai->id,
    'options' => array(
        'editable' => true,
        'selectable' => true,
        'selectHelper' => true,
        'dropable' => true,
        'eventClick' => 'js:function(event, eventElement){ alert("eventClick");
    }',
        'dayClick' => 'js:function(event, eventElement){ alert("dayClick");
    }',
        'eventResize' => 'js:function(event, eventElement){ alert("eventResize");
    }',
        'eventDrop' => 'js:function(event, eventElement){ alert("eventDrop");
    }',
        'select' => 'js:function(start, end, allDay){ var title = prompt(\'Event Title:\');
				if (title) {
					' . $cal_id . '.fullCalendar(\'renderEvent\',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				' . $cal_id . '.fullCalendar(\'unselect\'); }',
    ),
    'htmlOptions' => array(
        'class' => 'cal_theme',
        'style' => 'width:100%;margin: 0 auto;'
    ),
));
?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>