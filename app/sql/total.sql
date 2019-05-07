�y�����Ɓz�`�{�����̂�
select
 count(created_at) as day_count,
 date_format(created_at, '%Y%�N%m%��%d%��') as date
from
 posts
where
 date(created_at) = date(now())
group by date(created_at)
order by created_at;

�y�T���Ɓz�`���݂��獡���܂߂���O�V����(�t���ׂ����\)
select
 count(created_at) as week_count,
 date_format(created_at, '%Y%�N%m%��%d%��') as week
from
 posts
where
 date(created_at)
between
  (curdate() - interval 1 week)
and
  curdate()
group by date(created_at)
order by created_at;

�y�����Ɓz�`�������t�̔N������Ɍ��W�v
select
 count(created_at) as month_count,
 date_format(created_at, '%Y%�N%m%��') as month
from
 posts
where
 date_format(created_at, '%Y%m') = date_format(curdate(), '%Y%m')
group by month;
