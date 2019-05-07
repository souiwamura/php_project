y“ú‚²‚Æz`–{“ú•ª‚Ì‚İ
select
 count(created_at) as day_count,
 date_format(created_at, '%Y%”N%m%Œ%d%“ú') as date
from
 posts
where
 date(created_at) = date(now())
group by date(created_at)
order by created_at;

yT‚²‚Æz`Œ»İ‚©‚ç¡“úŠÜ‚ß‚½è‘O‚V“úŠÔ(•t‚«Œ×‚¬‚à‰Â”\)
select
 count(created_at) as week_count,
 date_format(created_at, '%Y%”N%m%Œ%d%“ú') as week
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

yŒ‚²‚Æz`¡“ú“ú•t‚Ì”NŒ‚ğŠî€‚ÉŒWŒv
select
 count(created_at) as month_count,
 date_format(created_at, '%Y%”N%m%Œ') as month
from
 posts
where
 date_format(created_at, '%Y%m') = date_format(curdate(), '%Y%m')
group by month;
