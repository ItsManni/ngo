-- Add ApprovalStatus column to testimonial table if it doesn't exist
ALTER TABLE `testimonial` ADD COLUMN `ApprovalStatus` ENUM('Pending', 'Approved', 'Disapproved') DEFAULT 'Pending' AFTER `IsActive`;

-- Update existing testimonials to have 'Approved' status if they are active
UPDATE `testimonial` SET `ApprovalStatus` = 'Approved' WHERE `IsActive` = 1 AND `ApprovalStatus` IS NULL; 