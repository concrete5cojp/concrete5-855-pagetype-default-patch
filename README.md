# concrete5 (Concrete CMS) 8.5.5 pacthes to fix 403 error on Page Type Default Editing Page
By concrete5 Japan, Inc.

This is the patch to fix 403 error when you tried to visit Page Type's Default Output editing page even if you are loggedin as super-admin due to mishanding session.

This was caused by both Concrete CMS and server side.

# Files to patch

Unless you have customization, simply update the following files to your Concrete CMS.

- application/controllers/single_page/dashboard/pages/types/output.php

# Instructions

- Check if your Concrete CMS site runs on version 8.5.5.
- Check if the Concrete CMS 8.5.5 site doesn't have any exisiting customization to above files
- If there is a conflict, apply the files accordingly. If there is no conflict, just upload and apply the patches.
- When you upgrade to newer version, check if the related pull request was merged into master and core function normally. If all the patches were included, remove these override patches during upgrade.

- If your Concrete CMS version is 8.5.1 or older, comment out line 40, then uncomment line 38

If you need some technical assistance, you can use our technical services. Please email us at info [at] concrete5.co.jp.


# Changelog

Date | Note
-----|-------
July 19, 2021 | Initial patches